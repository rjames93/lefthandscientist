#!/usr/bin/python
import random
random.seed(None)

def randomword():

	lotsofwords = open('count_1w.txt','r+')
	total = 0
	for line in lotsofwords:
		split = line.split("\t",2)
		count = int(split[1])
		total += count

	randval = int(abs(random.uniform(0,total)))

	lotsofwords.seek(0)

	curcount = 0
	word = ''
	while curcount < randval:
		line = lotsofwords.readline()
		split = line.split("\t",2)
		curcount += int(split[1])
		word = split[0]

	return word
	lotsofwords.close()


string = ''
for i in range(0,random.randint(2,8)):
	string = string + ' ' + randomword()


print string
