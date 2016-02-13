#!/bin/sh
thrift --gen php:oop,server -r -I . example.thrift