#!/usr/bin/python
import RPi.GPIO as GPIO
import settings
import motors_stop

# up
pins = [27, 22]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)

print "motor 1 up"
