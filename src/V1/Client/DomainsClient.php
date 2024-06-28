<?php
/*
 * Copyright 2024 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/domains/v1/domains.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Cloud\Domains\V1\Client;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\OperationResponse;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Domains\V1\AuthorizationCode;
use Google\Cloud\Domains\V1\ConfigureContactSettingsRequest;
use Google\Cloud\Domains\V1\ConfigureDnsSettingsRequest;
use Google\Cloud\Domains\V1\ConfigureManagementSettingsRequest;
use Google\Cloud\Domains\V1\DeleteRegistrationRequest;
use Google\Cloud\Domains\V1\ExportRegistrationRequest;
use Google\Cloud\Domains\V1\GetRegistrationRequest;
use Google\Cloud\Domains\V1\ListRegistrationsRequest;
use Google\Cloud\Domains\V1\RegisterDomainRequest;
use Google\Cloud\Domains\V1\Registration;
use Google\Cloud\Domains\V1\ResetAuthorizationCodeRequest;
use Google\Cloud\Domains\V1\RetrieveAuthorizationCodeRequest;
use Google\Cloud\Domains\V1\RetrieveRegisterParametersRequest;
use Google\Cloud\Domains\V1\RetrieveRegisterParametersResponse;
use Google\Cloud\Domains\V1\RetrieveTransferParametersRequest;
use Google\Cloud\Domains\V1\RetrieveTransferParametersResponse;
use Google\Cloud\Domains\V1\SearchDomainsRequest;
use Google\Cloud\Domains\V1\SearchDomainsResponse;
use Google\Cloud\Domains\V1\TransferDomainRequest;
use Google\Cloud\Domains\V1\UpdateRegistrationRequest;
use Google\LongRunning\Client\OperationsClient;
use Google\LongRunning\Operation;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * Service Description: The Cloud Domains API enables management and configuration of domain names.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * @method PromiseInterface configureContactSettingsAsync(ConfigureContactSettingsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface configureDnsSettingsAsync(ConfigureDnsSettingsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface configureManagementSettingsAsync(ConfigureManagementSettingsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface deleteRegistrationAsync(DeleteRegistrationRequest $request, array $optionalArgs = [])
 * @method PromiseInterface exportRegistrationAsync(ExportRegistrationRequest $request, array $optionalArgs = [])
 * @method PromiseInterface getRegistrationAsync(GetRegistrationRequest $request, array $optionalArgs = [])
 * @method PromiseInterface listRegistrationsAsync(ListRegistrationsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface registerDomainAsync(RegisterDomainRequest $request, array $optionalArgs = [])
 * @method PromiseInterface resetAuthorizationCodeAsync(ResetAuthorizationCodeRequest $request, array $optionalArgs = [])
 * @method PromiseInterface retrieveAuthorizationCodeAsync(RetrieveAuthorizationCodeRequest $request, array $optionalArgs = [])
 * @method PromiseInterface retrieveRegisterParametersAsync(RetrieveRegisterParametersRequest $request, array $optionalArgs = [])
 * @method PromiseInterface retrieveTransferParametersAsync(RetrieveTransferParametersRequest $request, array $optionalArgs = [])
 * @method PromiseInterface searchDomainsAsync(SearchDomainsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface transferDomainAsync(TransferDomainRequest $request, array $optionalArgs = [])
 * @method PromiseInterface updateRegistrationAsync(UpdateRegistrationRequest $request, array $optionalArgs = [])
 */
final class DomainsClient
{
    use GapicClientTrait;
    use ResourceHelperTrait;

    /** The name of the service. */
    private const SERVICE_NAME = 'google.cloud.domains.v1.Domains';

    /**
     * The default address of the service.
     *
     * @deprecated SERVICE_ADDRESS_TEMPLATE should be used instead.
     */
    private const SERVICE_ADDRESS = 'domains.googleapis.com';

    /** The address template of the service. */
    private const SERVICE_ADDRESS_TEMPLATE = 'domains.UNIVERSE_DOMAIN';

    /** The default port of the service. */
    private const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    private const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = ['https://www.googleapis.com/auth/cloud-platform'];

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/domains_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/domains_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/domains_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/domains_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Return an OperationsClient object with the same endpoint as $this.
     *
     * @return OperationsClient
     */
    public function getOperationsClient()
    {
        return $this->operationsClient;
    }

    /**
     * Resume an existing long running operation that was previously started by a long
     * running API method. If $methodName is not provided, or does not match a long
     * running API method, then the operation can still be resumed, but the
     * OperationResponse object will not deserialize the final response.
     *
     * @param string $operationName The name of the long running operation
     * @param string $methodName    The name of the method used to start the operation
     *
     * @return OperationResponse
     */
    public function resumeOperation($operationName, $methodName = null)
    {
        $options = isset($this->descriptors[$methodName]['longRunning'])
            ? $this->descriptors[$methodName]['longRunning']
            : [];
        $operation = new OperationResponse($operationName, $this->getOperationsClient(), $options);
        $operation->reload();
        return $operation;
    }

    /**
     * Create the default operation client for the service.
     *
     * @param array $options ClientOptions for the client.
     *
     * @return OperationsClient
     */
    private function createOperationsClient(array $options)
    {
        // Unset client-specific configuration options
        unset($options['serviceName'], $options['clientConfig'], $options['descriptorsConfigPath']);

        if (isset($options['operationsClient'])) {
            return $options['operationsClient'];
        }

        return new OperationsClient($options);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a location
     * resource.
     *
     * @param string $project
     * @param string $location
     *
     * @return string The formatted location resource.
     */
    public static function locationName(string $project, string $location): string
    {
        return self::getPathTemplate('location')->render([
            'project' => $project,
            'location' => $location,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a registration
     * resource.
     *
     * @param string $project
     * @param string $location
     * @param string $registration
     *
     * @return string The formatted registration resource.
     */
    public static function registrationName(string $project, string $location, string $registration): string
    {
        return self::getPathTemplate('registration')->render([
            'project' => $project,
            'location' => $location,
            'registration' => $registration,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - location: projects/{project}/locations/{location}
     * - registration: projects/{project}/locations/{location}/registrations/{registration}
     *
     * The optional $template argument can be supplied to specify a particular pattern,
     * and must match one of the templates listed above. If no $template argument is
     * provided, or if the $template argument does not match one of the templates
     * listed, then parseName will check each of the supported templates, and return
     * the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     */
    public static function parseName(string $formattedName, string $template = null): array
    {
        return self::parseFormattedName($formattedName, $template);
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'domains.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $apiEndpoint setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     * }
     *
     * @throws ValidationException
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
        $this->operationsClient = $this->createOperationsClient($clientOptions);
    }

    /** Handles execution of the async variants for each documented method. */
    public function __call($method, $args)
    {
        if (substr($method, -5) !== 'Async') {
            trigger_error('Call to undefined method ' . __CLASS__ . "::$method()", E_USER_ERROR);
        }

        array_unshift($args, substr($method, 0, -5));
        return call_user_func_array([$this, 'startAsyncCall'], $args);
    }

    /**
     * Updates a `Registration`'s contact settings. Some changes require
     * confirmation by the domain's registrant contact .
     *
     * The async variant is {@see DomainsClient::configureContactSettingsAsync()} .
     *
     * @example samples/V1/DomainsClient/configure_contact_settings.php
     *
     * @param ConfigureContactSettingsRequest $request     A request to house fields associated with the call.
     * @param array                           $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function configureContactSettings(
        ConfigureContactSettingsRequest $request,
        array $callOptions = []
    ): OperationResponse {
        return $this->startApiCall('ConfigureContactSettings', $request, $callOptions)->wait();
    }

    /**
     * Updates a `Registration`'s DNS settings.
     *
     * The async variant is {@see DomainsClient::configureDnsSettingsAsync()} .
     *
     * @example samples/V1/DomainsClient/configure_dns_settings.php
     *
     * @param ConfigureDnsSettingsRequest $request     A request to house fields associated with the call.
     * @param array                       $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function configureDnsSettings(
        ConfigureDnsSettingsRequest $request,
        array $callOptions = []
    ): OperationResponse {
        return $this->startApiCall('ConfigureDnsSettings', $request, $callOptions)->wait();
    }

    /**
     * Updates a `Registration`'s management settings.
     *
     * The async variant is {@see DomainsClient::configureManagementSettingsAsync()} .
     *
     * @example samples/V1/DomainsClient/configure_management_settings.php
     *
     * @param ConfigureManagementSettingsRequest $request     A request to house fields associated with the call.
     * @param array                              $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function configureManagementSettings(
        ConfigureManagementSettingsRequest $request,
        array $callOptions = []
    ): OperationResponse {
        return $this->startApiCall('ConfigureManagementSettings', $request, $callOptions)->wait();
    }

    /**
     * Deletes a `Registration` resource.
     *
     * This method works on any `Registration` resource using [Subscription or
     * Commitment billing](/domains/pricing#billing-models), provided that the
     * resource was created at least 1 day in the past.
     *
     * For `Registration` resources using
     * [Monthly billing](/domains/pricing#billing-models), this method works if:
     *
     * * `state` is `EXPORTED` with `expire_time` in the past
     * * `state` is `REGISTRATION_FAILED`
     * * `state` is `TRANSFER_FAILED`
     *
     * When an active registration is successfully deleted, you can continue to
     * use the domain in [Google Domains](https://domains.google/) until it
     * expires. The calling user becomes the domain's sole owner in Google
     * Domains, and permissions for the domain are subsequently managed there. The
     * domain does not renew automatically unless the new owner sets up billing in
     * Google Domains.
     *
     * The async variant is {@see DomainsClient::deleteRegistrationAsync()} .
     *
     * @example samples/V1/DomainsClient/delete_registration.php
     *
     * @param DeleteRegistrationRequest $request     A request to house fields associated with the call.
     * @param array                     $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function deleteRegistration(DeleteRegistrationRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('DeleteRegistration', $request, $callOptions)->wait();
    }

    /**
     * Exports a `Registration` resource, such that it is no longer managed by
     * Cloud Domains.
     *
     * When an active domain is successfully exported, you can continue to use the
     * domain in [Google Domains](https://domains.google/) until it expires. The
     * calling user becomes the domain's sole owner in Google Domains, and
     * permissions for the domain are subsequently managed there. The domain does
     * not renew automatically unless the new owner sets up billing in Google
     * Domains.
     *
     * The async variant is {@see DomainsClient::exportRegistrationAsync()} .
     *
     * @example samples/V1/DomainsClient/export_registration.php
     *
     * @param ExportRegistrationRequest $request     A request to house fields associated with the call.
     * @param array                     $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function exportRegistration(ExportRegistrationRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('ExportRegistration', $request, $callOptions)->wait();
    }

    /**
     * Gets the details of a `Registration` resource.
     *
     * The async variant is {@see DomainsClient::getRegistrationAsync()} .
     *
     * @example samples/V1/DomainsClient/get_registration.php
     *
     * @param GetRegistrationRequest $request     A request to house fields associated with the call.
     * @param array                  $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Registration
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getRegistration(GetRegistrationRequest $request, array $callOptions = []): Registration
    {
        return $this->startApiCall('GetRegistration', $request, $callOptions)->wait();
    }

    /**
     * Lists the `Registration` resources in a project.
     *
     * The async variant is {@see DomainsClient::listRegistrationsAsync()} .
     *
     * @example samples/V1/DomainsClient/list_registrations.php
     *
     * @param ListRegistrationsRequest $request     A request to house fields associated with the call.
     * @param array                    $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listRegistrations(ListRegistrationsRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('ListRegistrations', $request, $callOptions);
    }

    /**
     * Registers a new domain name and creates a corresponding `Registration`
     * resource.
     *
     * Call `RetrieveRegisterParameters` first to check availability of the domain
     * name and determine parameters like price that are needed to build a call to
     * this method.
     *
     * A successful call creates a `Registration` resource in state
     * `REGISTRATION_PENDING`, which resolves to `ACTIVE` within 1-2
     * minutes, indicating that the domain was successfully registered. If the
     * resource ends up in state `REGISTRATION_FAILED`, it indicates that the
     * domain was not registered successfully, and you can safely delete the
     * resource and retry registration.
     *
     * The async variant is {@see DomainsClient::registerDomainAsync()} .
     *
     * @example samples/V1/DomainsClient/register_domain.php
     *
     * @param RegisterDomainRequest $request     A request to house fields associated with the call.
     * @param array                 $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function registerDomain(RegisterDomainRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('RegisterDomain', $request, $callOptions)->wait();
    }

    /**
     * Resets the authorization code of the `Registration` to a new random string.
     *
     * You can call this method only after 60 days have elapsed since the initial
     * domain registration.
     *
     * The async variant is {@see DomainsClient::resetAuthorizationCodeAsync()} .
     *
     * @example samples/V1/DomainsClient/reset_authorization_code.php
     *
     * @param ResetAuthorizationCodeRequest $request     A request to house fields associated with the call.
     * @param array                         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return AuthorizationCode
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function resetAuthorizationCode(
        ResetAuthorizationCodeRequest $request,
        array $callOptions = []
    ): AuthorizationCode {
        return $this->startApiCall('ResetAuthorizationCode', $request, $callOptions)->wait();
    }

    /**
     * Gets the authorization code of the `Registration` for the purpose of
     * transferring the domain to another registrar.
     *
     * You can call this method only after 60 days have elapsed since the initial
     * domain registration.
     *
     * The async variant is {@see DomainsClient::retrieveAuthorizationCodeAsync()} .
     *
     * @example samples/V1/DomainsClient/retrieve_authorization_code.php
     *
     * @param RetrieveAuthorizationCodeRequest $request     A request to house fields associated with the call.
     * @param array                            $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return AuthorizationCode
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function retrieveAuthorizationCode(
        RetrieveAuthorizationCodeRequest $request,
        array $callOptions = []
    ): AuthorizationCode {
        return $this->startApiCall('RetrieveAuthorizationCode', $request, $callOptions)->wait();
    }

    /**
     * Gets parameters needed to register a new domain name, including price and
     * up-to-date availability. Use the returned values to call `RegisterDomain`.
     *
     * The async variant is {@see DomainsClient::retrieveRegisterParametersAsync()} .
     *
     * @example samples/V1/DomainsClient/retrieve_register_parameters.php
     *
     * @param RetrieveRegisterParametersRequest $request     A request to house fields associated with the call.
     * @param array                             $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return RetrieveRegisterParametersResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function retrieveRegisterParameters(
        RetrieveRegisterParametersRequest $request,
        array $callOptions = []
    ): RetrieveRegisterParametersResponse {
        return $this->startApiCall('RetrieveRegisterParameters', $request, $callOptions)->wait();
    }

    /**
     * Gets parameters needed to transfer a domain name from another registrar to
     * Cloud Domains. For domains managed by Google Domains, transferring to Cloud
     * Domains is not supported.
     *
     *
     * Use the returned values to call `TransferDomain`.
     *
     * The async variant is {@see DomainsClient::retrieveTransferParametersAsync()} .
     *
     * @example samples/V1/DomainsClient/retrieve_transfer_parameters.php
     *
     * @param RetrieveTransferParametersRequest $request     A request to house fields associated with the call.
     * @param array                             $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return RetrieveTransferParametersResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function retrieveTransferParameters(
        RetrieveTransferParametersRequest $request,
        array $callOptions = []
    ): RetrieveTransferParametersResponse {
        return $this->startApiCall('RetrieveTransferParameters', $request, $callOptions)->wait();
    }

    /**
     * Searches for available domain names similar to the provided query.
     *
     * Availability results from this method are approximate; call
     * `RetrieveRegisterParameters` on a domain before registering to confirm
     * availability.
     *
     * The async variant is {@see DomainsClient::searchDomainsAsync()} .
     *
     * @example samples/V1/DomainsClient/search_domains.php
     *
     * @param SearchDomainsRequest $request     A request to house fields associated with the call.
     * @param array                $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return SearchDomainsResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function searchDomains(SearchDomainsRequest $request, array $callOptions = []): SearchDomainsResponse
    {
        return $this->startApiCall('SearchDomains', $request, $callOptions)->wait();
    }

    /**
     * Transfers a domain name from another registrar to Cloud Domains.  For
     * domains managed by Google Domains, transferring to Cloud Domains is not
     * supported.
     *
     *
     * Before calling this method, go to the domain's current registrar to unlock
     * the domain for transfer and retrieve the domain's transfer authorization
     * code. Then call `RetrieveTransferParameters` to confirm that the domain is
     * unlocked and to get values needed to build a call to this method.
     *
     * A successful call creates a `Registration` resource in state
     * `TRANSFER_PENDING`. It can take several days to complete the transfer
     * process. The registrant can often speed up this process by approving the
     * transfer through the current registrar, either by clicking a link in an
     * email from the registrar or by visiting the registrar's website.
     *
     * A few minutes after transfer approval, the resource transitions to state
     * `ACTIVE`, indicating that the transfer was successful. If the transfer is
     * rejected or the request expires without being approved, the resource can
     * end up in state `TRANSFER_FAILED`. If transfer fails, you can safely delete
     * the resource and retry the transfer.
     *
     * The async variant is {@see DomainsClient::transferDomainAsync()} .
     *
     * @example samples/V1/DomainsClient/transfer_domain.php
     *
     * @param TransferDomainRequest $request     A request to house fields associated with the call.
     * @param array                 $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function transferDomain(TransferDomainRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('TransferDomain', $request, $callOptions)->wait();
    }

    /**
     * Updates select fields of a `Registration` resource, notably `labels`. To
     * update other fields, use the appropriate custom update method:
     *
     * * To update management settings, see `ConfigureManagementSettings`
     * * To update DNS configuration, see `ConfigureDnsSettings`
     * * To update contact information, see `ConfigureContactSettings`
     *
     * The async variant is {@see DomainsClient::updateRegistrationAsync()} .
     *
     * @example samples/V1/DomainsClient/update_registration.php
     *
     * @param UpdateRegistrationRequest $request     A request to house fields associated with the call.
     * @param array                     $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function updateRegistration(UpdateRegistrationRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('UpdateRegistration', $request, $callOptions)->wait();
    }
}
