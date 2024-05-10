import {createFraction} from '../fraction';

test('Проверка метода getNumer()', () => {
  const frac = createFraction(3, 4);
  expect(frac.getNumer()).toBe(3);
});

test('Проверка метода getDenom()', () => {
  const frac = createFraction(3, 4);
  expect(frac.getDenom()).toBe(4);
});

test('Проверка метода add()', () => {
  const frac1 = createFraction(3, 4);
  const frac2 = createFraction(1, 2);
  const sum = frac1.add(frac2);
  expect(sum.getNumer()).toBe(5);
  expect(sum.getDenom()).toBe(4);
});

test('Проверка метода sub()', () => {
  const frac1 = createFraction(3, 4);
  const frac2 = createFraction(1, 2);
  const diff = frac1.sub(frac2);
  expect(diff.getNumer()).toBe(1);
  expect(diff.getDenom()).toBe(4);
});

test('Проверка метода toString()', () => {
  const frac1 = createFraction(3, 2);
  expect(frac1.toString()).toBe('1\'1/2');

  const frac2 = createFraction(3, 4);
  expect(frac2.toString()).toBe('3/4');

  const frac3 = createFraction(0, 4);
  expect(frac3.toString()).toBe('0');

  const frac4 = createFraction(6, 2);
  expect(frac4.toString()).toBe('3');

  const frac5 = createFraction(-7, 2);
  expect(frac5.toString()).toBe('-3\'1/2');
});
