export default class Fraction {
  constructor(numerator, denominator) {
    this.numerator = numerator;
    this.denominator = denominator;
    this.normalize();
  }

  gcd(a, b) {
    if (b === 0) {
      return a;
    }
    return this.gcd(b, a % b);
  }

  normalize() {
    const sign = Math.sign(this.numerator) * Math.sign(this.denominator);
    const absNumerator = Math.abs(this.numerator);
    const absDenominator = Math.abs(this.denominator);
    const divisor = this.gcd(absNumerator, absDenominator);
    this.normalizedNumerator = sign * (absNumerator / divisor);
    this.normalizedDenominator = absDenominator / divisor;
  }

  get numer() {
    return this.normalizedNumerator;
  }

  get denom() {
    return this.normalizedDenominator;
  }

  add(frac) {
    return new Fraction(
      this.normalizedNumerator * frac.denom + frac.numer * this.normalizedDenominator,
      this.normalizedDenominator * frac.denom
    );
  }

  sub(frac) {
    return new Fraction(
      this.normalizedNumerator * frac.denom - frac.numer * this.normalizedDenominator,
      this.normalizedDenominator * frac.denom
    );
  }

  toString() {
    const num = Math.abs(this.normalizedNumerator);
    const denom = this.normalizedDenominator;
    const whole = Math.floor(num / denom);
    const remainder = num % denom;
    let result = '';

    if (this.normalizedNumerator < 0) {
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
  }
}