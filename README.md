SIP API v1.0 - (C) 2012 www.standart-n.ru

***

# USAGE: #

## sip
command for get SIP info from FireBird<br/>
**example**:<br/>
`php5 api.php sip -g phone -pid 2,3,5 --t`<br/>
`php5 api.php sip get user profileid 2,3,5 -inc 1 -t`<br/>

## msg
command for send message in UDP socket on ipadress:port<br/>
**example**:<br/>
`php5 api.php msg -s 'hello' -ip 192.168.67.44 -p 80`<br/>

## getip
command for get IP address by phone number from FireBird database<br/>
**example**:<br/>
`php5 api.php getip -p 4444`
