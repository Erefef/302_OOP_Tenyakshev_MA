import Fraction from '../fraction';

describe('Fraction', () => {
  test('Проверка создания и методов getNumer() и getDenom()', () => {
    const fraction = new Fraction(4, 8);
    expect(fraction.getNumer()).toBe(1);
    expect(fraction.getDenom()).toBe(2);
  });

  test('Проверка метода add()', () => {
    const fraction1 = new Fraction(1, 4);
    const fraction2 = new Fraction(1, 3);
    const result = fraction1.add(fraction2);
    expect(result.getNumer()).toBe(7);
    expect(result.getDenom()).toBe(12);
  });

  test('Проверка метода sub()', () => {
    const fraction1 = new Fraction(1, 2);
    const fraction2 = new Fraction(3, 4);
    const result = fraction1.sub(fraction2);
    expect(result.getNumer()).toBe(-1);
    expect(result.getDenom()).toBe(4);
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
