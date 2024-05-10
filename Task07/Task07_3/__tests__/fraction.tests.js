import Fraction from '../fraction';

describe('Fraction', () => {
  test('Проверка создания и нормализации', () => {
    const fraction = new Fraction(4, 8);
    expect(fraction.numer).toBe(1);
    expect(fraction.denom).toBe(2);
  });

  test('Проверка метода add()', () => {
    const fraction1 = new Fraction(1, 4);
    const fraction2 = new Fraction(1, 3);
    const result = fraction1.add(fraction2);
    expect(result.numer).toBe(7);
    expect(result.denom).toBe(12);
  });

  test('Проверка метода sub()', () => {
    const fraction1 = new Fraction(1, 5);
    const fraction2 = new Fraction(3, 5);
    const result = fraction1.sub(fraction2);
    expect(result.numer).toBe(-2);
    expect(result.denom).toBe(5);
  });

  test('Проверка метода toString()', () => {
    const fraction1 = new Fraction(3, 2);
    expect(fraction1.toString()).toBe('1\'1/2');

    const fraction2 = new Fraction(-5, 2);
    expect(fraction2.toString()).toBe('-2\'1/2');

    const fraction3 = new Fraction(0, 7);
    expect(fraction3.toString()).toBe('0');
  });
});
