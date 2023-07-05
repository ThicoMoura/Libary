FROM node

WORKDIR /home/node/libary

EXPOSE 3000

CMD [ "tail", "-f", "/dev/null" ]