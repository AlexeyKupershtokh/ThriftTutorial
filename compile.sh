#!/bin/sh
thrift --gen php:server -r -I . example.thrift
thrift --gen go             -r -I . example.thrift