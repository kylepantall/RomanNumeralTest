<h1>Roman Numeral Convertion</h1>

<p>The provided solution works sufficiently for most roman numerals. Exceptions that have been tested include:</p>
<ul>
  <li>MCXIX</li>
</ul>

<p>I believe this is due to the functionality of calculating the value of a roman numeral. Such as the process includes calculating in
pairs. Before doing this it would be beneficial to order the numeric values of each roman numeral.</p>

<p>For example, 1000 100 1 10 (1109 = MCIX) and work in reverse order:</p>
<strong>(10 - 1) + 100 + 1000 = 1109</strong>
<p>The current script disregards the possibility of a uneven roman numeral such as MCXIX.</p>
