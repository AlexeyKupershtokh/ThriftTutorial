namespace * Example

include "ClientVersion.thrift"
include "ServerError.thrift"
include "Session.thrift"

struct AuthenticateRequest {
  1: string deviceId,
  3: ClientVersion.ClientVersion clientVersion,
}

struct AuthenticateResponse {
  1: Session.AccessToken accessToken,
  2: bool linkedProfileAvailable,
}

service ServerQueriesHandler {
  string ping(),

  AuthenticateResponse authenticate(1: AuthenticateRequest authenticateRequest)
    throws (1: ServerError.ServerError serverError)
}
