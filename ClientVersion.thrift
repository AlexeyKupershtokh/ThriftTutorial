/*
Описание версии клиента.
*/
namespace * Example.ClientVersion

struct ClientVersion {
  1: string platform,
  2: string appStore,
  3: string version,
  4: string balanceVersion,
  5: bool developmentBuild,
}
