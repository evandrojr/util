#!/usr/bin/env ruby

# ARGV.each do|a|
#   puts "Argument: #{a}"
# end

contents = File.read(ARGV[0])
#contents = File.read("resultado")
#puts contents

tests = assertions = failures = errors = skips = 0

#vc={:test=>{"d+ tests,"}, :assertion=> }


contents.scan(/\d+ tests,/) do |ds|
  ds.scan(/\d+/) do |d|
    tests+= d.to_i
  end
end

contents.scan(/\d+ assertions,/) do |ds|
  ds.scan(/\d+/) do |d|
    assertions+= d.to_i
  end
end

contents.scan(/\d+ failures,/) do |ds|
  ds.scan(/\d+/) do |d|
    failures+= d.to_i
  end
end

contents.scan(/\d+ errors,/) do |ds|
  ds.scan(/\d+/) do |d|
    errors+= d.to_i
  end
end

contents.scan(/\d+ skips/) do |ds|
  ds.scan(/\d+/) do |d|
    skips+= d.to_i
  end
end

puts "tests #{tests} assertions #{assertions} failures #{failures} errors #{errors} skips #{skips}"
