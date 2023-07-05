const bcrypt = require('bcrypt-nodejs')

module.exports = app => {
    const { existsOrError, notExistsOrError, equalsOrError } = app.api.validation

    const encryptPassword = password => {
        const salt = bcrypt.genSaltSync(10)
        return bcrypt.hashSync(password, salt)
    }

    const save = async (req, res) => {
        const user = { ...req.body }
        if(req.params.id) user.id = req.params.id

        try {
            existsOrError(user.name, 'Name not informed')
            existsOrError(user.email, 'Email not informed')
            existsOrError(user.password, 'Password not informed')
            existsOrError(user.confirmPassword, 'Confirm Password not informed')
            equalsOrError(user.password, user.confirmPassword, 'The passwords not to same')

            const userFromDB = await app.db('users')
                .where({ email: user.email}).first()
            
            if(!user.id) notExistsOrError(userFromDB, 'User already register')
        } catch(msg) {
            return res.status(400).send(msg)
        }

        user.password = encryptPassword(user.password)
        delete user.confirmPassword

        if(user.id) 
            return app.db('users')
                    .update(user)
                    .where({ id: user.id })
                    .then(_ => res.status(204).send())
                    .catch(err => res.status(500).send(err))

        return app.db('users')
                .insert(user)
                .then(_ => res.status(201).send())
                .catch(err => res.status(500).send(err))

    }

    const list = (req, res) => app.db('users')
                                .select('id', 'name', 'email', 'role')
                                .then(users => res.json(users))
                                .catch(err => res.status(500).send(err))

    const get = (req, res) => app.db('users')
                                .select('id', 'name', 'email', 'role')
                                .where({ id: req.params.id })
                                .then(user => res.json(user))
                                .catch(err => res.status(500).send(err))

    return { save, list, get }
}