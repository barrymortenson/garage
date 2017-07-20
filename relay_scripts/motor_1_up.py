#!/usr/bin/python
import settings
import motors_stop

# up
pins = [27, 22]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)
