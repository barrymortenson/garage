#!/usr/bin/python
import settings
import motors_stop

# down
pins = [4, 17, 10, 9, 6, 13, 12, 16]
GPIO.setup(pins, GPIO.OUT, initial=GPIO.LOW)
