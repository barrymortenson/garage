#!/usr/bin/python
import settings
import motors_stop

# up
pins = [20, 21]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)
