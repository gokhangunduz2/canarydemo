FROM alpine:latest

RUN echo "Test app"

RUN pwd
RUN ls -ltra

CMD ["sleep", "infinity"]
