#!/usr/bin/python
import settings
import motors_stop

# down
pins = [10, 9]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)
