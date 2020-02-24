<?php

/*
*  Copyright (c) 2019-2020 Barchampas Gerasimos <makindosxx@gmail.com>.
*  proxior is a wifi interception.
*
*  proxior is free software: you can redistribute it and/or modify
*  it under the terms of the GNU Affero General Public License as published by
*  the Free Software Foundation, either version 3 of the License, or
*  (at your option) any later version.
*
*  proxior is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU Affero General Public License for more details.
*
*  You should have received a copy of the GNU Affero General Public License
*  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*
*/

$hua = filter_input(INPUT_SERVER, 'HTTP_USER_AGENT');
$os = '';


if(preg_match('/android/i', $hua)) 
{
$os = 'Android';
}


elseif (preg_match('/linux/i', $hua)) 
{
$os = 'Linux';
}


elseif (preg_match('/iphone/i', $hua)) 
{
$os = 'iPhone';
} 


elseif (preg_match('/macintosh|mac os x/i', $hua)) 
{
$os = 'Mac';
} 


elseif (preg_match('/windows|win32/i', $hua)) 
{
$os = 'Windows';
}

?>
