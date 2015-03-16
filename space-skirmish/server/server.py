import json
import sqlite3
from autobahn.twisted.websocket import WebSocketServerProtocol

class MyServerProtocol(WebSocketServerProtocol):
	gamestates = []
	def onMessage(self, payload, isBinary):
		if isBinary:
			print("Binary message received: {} bytes".format(len(payload)))
		else:
			print("Text message received: {}".format(payload.decode('utf8')))
		recstate = json.loads(payload.decode('utf8'));
		print recstate
		self.addstatetogame(recstate)
		self.gameloop()
		self.sendMessage(payload, isBinary) #This just responds with the exact same information it was just sent
	def onConnect(self, request):
		print("Client connecting: {}".format(request.peer))
	def onClose(self, wasClean, code, reason):
		print("WebSocket connection closed: {}".format(reason))
	def onOpen(self):
		print("WebSocket connection open.")
	def addstatetogame(self,statetoadd):
		self.gamestates.append(statetoadd)
		for member in self.gamestates:
			if member["key"] == statetoadd["key"]:
				#Update the information
				print "already exists"
				member = statetoadd
			else:
				#Add to the end
				self.gamestates.append(statetoadd)

	def gameloop(self):
		for member in self.gamestates:
			for collisioncheck in self.gamestates:
				if member["corecoord"] == gamestates["corecoord"]:
					gamestates["corecoord"][0] += 1.0;
					gamestates["corecoord"][1] += 1.0;
				else:
					print("Meh!");


if __name__ == '__main__':
	import sys
	
	from twisted.python import log
	from twisted.internet import reactor
	logfile = open("logging.log","w+");
	log.startLogging(logfile)

	from autobahn.twisted.websocket import WebSocketServerFactory
	factory = WebSocketServerFactory()
	factory.protocol = MyServerProtocol

	reactor.listenTCP(9000, factory)
	reactor.run()
