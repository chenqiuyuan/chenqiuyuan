# -*- coding: utf-8 -*-
import datetime
import functools
import os
def log(text):
    if callable(text):
        @functools.wraps(text)
        def wrapper(*args,**kw):
            time1 = datetime.datetime.now()
            print "begin call " + text.__name__ + "()"
            text(*args,**kw)
            time2 = datetime.datetime.now()
            t = time2 - time1
            print "end call " + text.__name__ + "()"
            sleep(3)
            print t.seconds
        return wrapper
    else:
        def decorate(func):
            @functools.wraps(func)
            def wrapper(*args,**kw):
                print "begin call " + func.__name__ + "() " + str(text)
                func(*args,**kw)
                print "end call " + func.__name__ + "() " + str(text)
            return wrapper
        return decorate


@log
def now1():
    print 'hello'

@log(233)
def now2():
    print "233"

now1()
now2()