export default function Fraction(numerator, denominator) {
  this.numerator = numerator;
  this.denominator = denominator;
  this.normalize();
}

Fraction.prototype.gcd = function (a, b) {
  if (b === 0) {
    return a;
  }
  return this.gcd(b, a % b);
};

Fraction.prototype.normalize = function () {
  const sign = Math.sign(this.numerator) * Math.sign(this.denominator);
  const absNumerator = Math.abs(this.numerator);
  const absDenominator = Math.abs(this.denominator);
  const divisor = this.gcd(absNumerator, absDenominator);
  this.normalizedNumerator = sign * (absNumerator / divisor);
  this.normalizedDenominator = absDenominator / divisor;
};

Fraction.prototype.getNumer = function () {
  return this.normalizedNumerator;
};

Fraction.prototype.getDenom = function () {
  return this.normalizedDenominator;
};

Fraction.prototype.add = function (frac) {
  return new Fraction(
    this.normalizedNumerator * frac.getDenom() + frac.getNumer() * this.normalizedDenominator,
    this.normalizedDenominator * frac.getDenom()
  );
};

Fraction.prototype.sub = function (frac) {
  return new Fraction(
    this.normalizedNumerator * frac.getDenom() - frac.getNumer() * this.normalizedDenominator,
    this.normalizedDenominator * frac.getDenom()
  );
};

Fraction.prototype.toString = function () {
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
};

// module.exports = Fraction;
