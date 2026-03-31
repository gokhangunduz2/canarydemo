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
		    docker build -t gokhangunduz1/canarydemo:$commit -f Dockerfile .	    
                    docker tag gokhangunduz1/canarydemo:${commit} gokhangunduz1/canarydemo:latest
		    docker push gokhangunduz1/canarydemo:${commit}
		    docker push gokhangunduz1/canarydemo:latest
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
