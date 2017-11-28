import argparse

def Main():
	parser = argparse.ArgumentParser()
	parser.add_argument("file", help="Specify A File")	#Necessary argument
	parser.add_argument("-o", "--output", help="Print output to Terminal"	#Output
				, action="store_true")
	args = parser.parse_args()

	if args.file:
		offset = 0
		with open(args.file, 'rb') as infile:
			with open(args.file + ".txt", 'w') as outfile:
				while True:
					chunk = infile.read(16)
					if len(chunk) == 0:
						break
					
					output += " ".join("{:02X}".format(ord(c)) \
							for c in chunk[:8])
					
					output += " ".join("{:02X}".format(ord(c)) \
							for c in chunk[8:])

					if len(chunk) % 16 != 0:
						output += "   "*(16-len(chunk))
					else:
						output += " "

					if args.output:
						print output
					outfile.write(output + '\n')

					offset += 16
					
	else:
		print parser.usage


if __name__ == '__main__':
	Main()
