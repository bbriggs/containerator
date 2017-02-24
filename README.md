# Containerator

Containerator is a digital taplist for homebrew kegerators/keezers.  

## What is it and why?

Concept was inspired by Kegerface and RaspberryPints taplists, but with a few changes.

- I wanted to modernize the UI a bit with material design (I just like it)
- Add responsiveness for display on tablets (or small displays)  
- Simplify deployment with Docker (helm chart coming soon)

## Usage

1. Install [Docker](https://docs.docker.com/engine/installation/)
1. Clone this repo
1. Create a dev.env file to match the example dev.env_example file and add the appropriate credentials (or just remove the \_example)
1. Run `docker-compose build` from the root directory (the one with docker-compose.yml)
1. Run `docker-compose up -d` from the same directory
1. view page from localhost:81 on your browser

## To Do
- Finish Admin page
- Helm configuration

## Inspiration

Kegerface:
http://github.com/kegerface/kegerface

RaspberryPints:
http://raspberrypints.com/
