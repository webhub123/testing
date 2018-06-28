function inwords(n, custom_join_character) {

      var subtr = n.toString().split('.');

      var string = subtr[0],
          units, tens, scales, start, end, chunks, chunksLen, chunk, ints, i, word, words;

      var and = custom_join_character || '';

      if (parseInt(string) === 0) {
          return 'zero';
      }

      units = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];


      tens = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];


      scales = ['', 'Thousand', 'Million', 'Billion', 'Trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion', 'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quatttuor-decillion', 'quindecillion', 'sexdecillion', 'septen-decillion', 'octodecillion', 'novemdecillion', 'vigintillion', 'centillion'];

      start = string.length;
      chunks = [];
      while (start > 0) {
          end = start;
          chunks.push(string.slice((start = Math.max(0, start - 3)), end));
      }

      chunksLen = chunks.length;
      if (chunksLen > scales.length) {
          return '';
      }

      words = [];
      for (i = 0; i < chunksLen; i++) {

          chunk = parseInt(chunks[i]);

          if (chunk) {

              ints = chunks[i].split('').reverse().map(parseFloat);

              if (ints[1] === 1) {
                  ints[0] += 10;
              }

              if ((word = scales[i])) {
                  words.push(word);
              }

              if ((word = units[ints[0]])) {
                  words.push(word);
              }

              if ((word = tens[ints[1]])) {
                  words.push(word);
              }

              if (ints[0] || ints[1]) {

                  if (ints[2] || !i && chunksLen) {
                      words.push(and);
                  }
              }

              if ((word = units[ints[2]])) {
                  words.push(word + ' Hundred');
              }
          }
      }


      if(subtr[1] > 0) {
          var c_words = words.reverse().join(' ')+' and '+subtr[1]+'/100';
      }else {
          var c_words = words.reverse().join(' ');
      }

      return c_words;
  }
