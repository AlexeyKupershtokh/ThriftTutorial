#!/bin/sh
thrift --gen php:oop,server -r -I . example.thrift
thrift --gen go             -r -I . example.thrift