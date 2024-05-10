export function createFraction(numerator, denominator) {
    const gcd = (a, b) => {
      if (b === 0) {
        return a;
      }
      return gcd(b, a % b);
    };
  
    const sign = Math.sign(numerator) * Math.sign(denominator);
    const absNumerator = Math.abs(numerator);
    const absDenominator = Math.abs(denominator);
    const divisor = gcd(absNumerator, absDenominator);
    const normalizedNumerator = sign * (absNumerator / divisor);
    const normalizedDenominator = absDenominator / divisor;
  
    return {
      getNumer: () => normalizedNumerator,
      getDenom: () => normalizedDenominator,
      add: (frac) => createFraction(
        normalizedNumerator * frac.getDenom() + frac.getNumer() * normalizedDenominator,
        normalizedDenominator * frac.getDenom()
      ),
      sub: (frac) => createFraction(
        normalizedNumerator * frac.getDenom() - frac.getNumer() * normalizedDenominator,
        normalizedDenominator * frac.getDenom()
      ),
      toString: () => {
        const num = Math.abs(normalizedNumerator);
        const denom = normalizedDenominator;
        const whole = Math.floor(num / denom);
        const remainder = num % denom;
        let result = '';
        if (normalizedNumerator < 0) {
          result += '-';
        }
        if (whole !== 0 && remainder !== 0) {
          result += `${whole}'${remainder}/${denom}`;
        } else if (whole !== 0) {
          result += `${whole}`;
        } else if (remainder !== 0) {
          result += `${remainder}/${denom}`;
        } else {
          result += '0';
        }
        return result;
      },
    };
  }
  