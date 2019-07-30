<h1>Roman Numeral Convertion</h1>

<p>The provided solution works sufficiently for most roman numerals. Exceptions that have been tested include:</p>
<ul>
  <li>MCXIX</li>
</ul>

<p>I believe this is due to the functionality of calculating the value of a roman numeral. The process includes calculating in
pairs. One improvement could include ordering the numeric values into pairs.</p>

<p>For exmaple: MM, IX, CC etc. Then find grouping of Roman Numerals. For these solutions that was not done due to code originality.</p>
<p>It was crucial for the script to have the capacity of calculating roman numerals from the base upwards</p>

<p>Working in reverse order could be extremely beneficial, an example includes: </p>
<p>Taking a Roman Numerical Value such as MCIX (Equals 1109) and work in reverse order:</p>
<strong>(10 - 1) + 100 + 1000 = 1109</strong>

<p>The current script disregards the possibility of a uneven roman numeral such as MCXIX.</p>
<p>The script processes all the pairs:</p>
<ul>
  <li>MC</li>
 <li><XI</li>
  </ul>
  <p>But disregards the deduction of 1 from 10. For example X - I (10 deduct 1) this is because the script handles the last digit by simply adding this to the final calculation.</p>
  
  <p>I hope to further improve this script, as said previously, by pairing as many values as possible and adding all pairs and individual values remaing. I feel this method would be faster performance-wise but more beneficial for more complex roman numeral values.</p>
