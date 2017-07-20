#!/usr/bin/python
import settings
import motors_stop

# up
pins = [19, 26]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)
