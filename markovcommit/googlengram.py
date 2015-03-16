#!/usr/bin/python

import zipfile

for i in xrange(0,9):
	zipfile = ZipFile("googlebooks-eng-all-2gram-20090715-"i".csv.zip",r);
	csvfile = zipfile.open("googlebooks-eng-all-2gram-20090715-"i".csv");

			
