#!/usr/bin/python
import RPi.GPIO as GPIO
import settings
import motors_stop

# down
pins = [4, 17]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)
