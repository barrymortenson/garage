#!/usr/bin/python
import RPi.GPIO as GPIO
import settings
import motors_stop

# down
pins = [12, 16]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)

print "motor 4 down"
