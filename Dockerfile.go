FROM golang:1.23.3-alpine
WORKDIR /app

COPY ./backend/go.* ./

RUN go mod download

COPY ./backend .

RUN go build -o main main.go

EXPOSE 8080

VOLUME [ "/app" ]

CMD [ "./main" ]