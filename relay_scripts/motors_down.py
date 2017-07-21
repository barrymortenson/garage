#!/usr/bin/python
import RPi.GPIO as GPIO
import settings
import motors_stop

# down
pins = [4, 17, 10, 9, 6, 13, 12, 16]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)

print "all motors down"
