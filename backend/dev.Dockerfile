FROM node

WORKDIR /home/node/libary

EXPOSE 3000

RUN npm install -g @dbml/cli dbdocs knex

CMD [ "tail", "-f", "/dev/null" ]