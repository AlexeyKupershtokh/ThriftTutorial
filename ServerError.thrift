/*
Описание ошибки сервера.
*/

namespace * Example.ServerError

exception ServerError {
  1: string error,
  2: string backtrace,
  3: map<string, string> context,
  4: string refId,
  5: string humanErrorTextId,
  6: bool shouldRelogin,
}
