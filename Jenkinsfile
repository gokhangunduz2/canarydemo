pipeline {
    
    agent any

    stages {
		stage('Checkout') {
		    steps {
		        cleanWs()
		        git branch: "${branch_name}", url: 'https://github.com/gokhangunduz2/canarydemo.git'
		    }
		}
        stage('Build') {
            steps {
                sh '''
					#!/bin/bash
                    pwd
                    ls -ltr
                    echo "Build step started"
		    commit=$(git rev-parse --short HEAD)
		    docker build -t gokhangunduz1/phpapp:$commit -f Dockerfile .	    
                    docker tag gokhangunduz1/phpapp:${commit} gokhangunduz1/phpapp:latest
		    docker push gokhangunduz1/phpapp:${commit}
		    docker push gokhangunduz1/phpapp:latest
                    echo "Build step completed successfully. Next step is Test ...."
                '''
            }
        }
		stage('Deploy') {
			steps{
				sh '''
					commitf=$(git rev-parse --short HEAD)
					curl -X POST http://192.168.1.200:5000/deploy?tag=$commitf
				'''
			}
		}
    }
}
