#!/usr/bin/python
import RPi.GPIO as GPIO
import settings
import motors_stop

# up
pins = [27, 22, 11, 5, 19, 26, 20, 21]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)
