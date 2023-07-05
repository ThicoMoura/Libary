/**
 * @param { import("knex").Knex } knex
 * @returns { Promise<void> }
 */
exports.up = function(knex) {
    return knex.schema
        .raw('create extension if not exists "uuid-ossp"')
        .createTableIfNotExists('users', table => {
            table.uuid('id').primary().notNullable().defaultTo(knex.raw('uuid_generate_v4()'))
            table.string('name').notNullable()
            table.string('email').unique().notNullable()
            table.string('password').notNullable()
            table.enu('role', ['ADMIN', 'CLIENT']).notNullable().defaultTo('CLIENT')
        })
        .createTableIfNotExists('books', table => {
            table.uuid('id').primary().notNullable().defaultTo(knex.raw('uuid_generate_v4()'))
            table.string('title').notNullable()
            table.string('gender').notNullable()
            table.string('author').notNullable()
            table.date('publication_at').notNullable()
            table.timestamp('created_at', { useTz: true }).notNullable().defaultTo(knex.fn.now())
            table.uuid('created_by').references('id')
                .inTable('users')
                .notNullable()
            table.timestamp('updated_at', { useTz: true }).notNullable().defaultTo(knex.fn.now())
            table.uuid('updated_by').references('id')
                .inTable('users')
                .notNullable()
        })
        .createTableIfNotExists('specimens', table => {
            table.uuid('id').primary().notNullable().defaultTo(knex.raw('uuid_generate_v4()'))
            table.uuid('book_id').references('id')
                .inTable('books')
                .notNullable()
            table.enu('status', ['AVAILABLE', 'LOANED'])
        })
        .createTableIfNotExists('loans', table => {
            table.uuid('specimens_id').references('id')
                .inTable('specimens')
                .notNullable()
            table.uuid('user_id').references('id')
                .inTable('users')
                .notNullable()
            table.date('forecast_at').notNullable()
            table.timestamp('returned_at').nullable()
            table.enu('status', ['RETURNED', 'LOANED'])
        })
};

/**
 * @param { import("knex").Knex } knex
 * @returns { Promise<void> }
 */
exports.down = function(knex) {
    return knex.schema
            .dropTableIfExists('loans')
            .dropTableIfExists('specimens')
            .dropTableIfExists('books')
            .dropTableIfExists('users')
};
