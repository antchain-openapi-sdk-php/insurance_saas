<?php

// This file is auto-generated, don't edit it. Thanks.

namespace AntChain\INSURANCE_SAAS;

use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Tea\Exception\TeaUnableRetryError;
use AlibabaCloud\Tea\Request;
use AlibabaCloud\Tea\RpcUtils\RpcUtils;
use AlibabaCloud\Tea\Tea;
use AlibabaCloud\Tea\Utils\Utils;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;
use AntChain\INSURANCE_SAAS\Models\ApplyClaimRequest;
use AntChain\INSURANCE_SAAS\Models\ApplyClaimResponse;
use AntChain\INSURANCE_SAAS\Models\ApplyEndorsementStrategyRequest;
use AntChain\INSURANCE_SAAS\Models\ApplyEndorsementStrategyResponse;
use AntChain\INSURANCE_SAAS\Models\ApplyInsureRequest;
use AntChain\INSURANCE_SAAS\Models\ApplyInsureResponse;
use AntChain\INSURANCE_SAAS\Models\ApplyUnderwritingRequest;
use AntChain\INSURANCE_SAAS\Models\ApplyUnderwritingResponse;
use AntChain\INSURANCE_SAAS\Models\CancelClaimRequest;
use AntChain\INSURANCE_SAAS\Models\CancelClaimResponse;
use AntChain\INSURANCE_SAAS\Models\ConfirmClaimSettleRequest;
use AntChain\INSURANCE_SAAS\Models\ConfirmClaimSettleResponse;
use AntChain\INSURANCE_SAAS\Models\FinishClaimSettleRequest;
use AntChain\INSURANCE_SAAS\Models\FinishClaimSettleResponse;
use AntChain\INSURANCE_SAAS\Models\NotifyPolicyResultRequest;
use AntChain\INSURANCE_SAAS\Models\NotifyPolicyResultResponse;
use AntChain\INSURANCE_SAAS\Models\QueryDataDisasterRequest;
use AntChain\INSURANCE_SAAS\Models\QueryDataDisasterResponse;
use AntChain\INSURANCE_SAAS\Models\QueryDataWeatherRequest;
use AntChain\INSURANCE_SAAS\Models\QueryDataWeatherResponse;
use AntChain\INSURANCE_SAAS\Models\QueryInquiryRequest;
use AntChain\INSURANCE_SAAS\Models\QueryInquiryResponse;
use AntChain\INSURANCE_SAAS\Models\QueryInsureResultRequest;
use AntChain\INSURANCE_SAAS\Models\QueryInsureResultResponse;
use AntChain\INSURANCE_SAAS\Models\QueryPolicyFileRequest;
use AntChain\INSURANCE_SAAS\Models\QueryPolicyFileResponse;
use AntChain\INSURANCE_SAAS\Models\QueryUnderwritingRequest;
use AntChain\INSURANCE_SAAS\Models\QueryUnderwritingResponse;
use AntChain\INSURANCE_SAAS\Models\SubmitInquiryRequest;
use AntChain\INSURANCE_SAAS\Models\SubmitInquiryResponse;
use AntChain\INSURANCE_SAAS\Models\SyncPolicyResultRequest;
use AntChain\INSURANCE_SAAS\Models\SyncPolicyResultResponse;
use AntChain\INSURANCE_SAAS\Models\SyncQuoteRequest;
use AntChain\INSURANCE_SAAS\Models\SyncQuoteResponse;
use AntChain\INSURANCE_SAAS\Models\UpdateClaimMaterialRequest;
use AntChain\INSURANCE_SAAS\Models\UpdateClaimMaterialResponse;
use AntChain\Util\UtilClient;
use Exception;

class Client
{
    protected $_endpoint;

    protected $_regionId;

    protected $_accessKeyId;

    protected $_accessKeySecret;

    protected $_protocol;

    protected $_userAgent;

    protected $_readTimeout;

    protected $_connectTimeout;

    protected $_httpProxy;

    protected $_httpsProxy;

    protected $_socks5Proxy;

    protected $_socks5NetWork;

    protected $_noProxy;

    protected $_maxIdleConns;

    protected $_securityToken;

    protected $_maxIdleTimeMillis;

    protected $_keepAliveDurationMillis;

    protected $_maxRequests;

    protected $_maxRequestsPerHost;

    /**
     * Init client with Config.
     *
     * @param config config contains the necessary information to create a client
     * @param mixed $config
     */
    public function __construct($config)
    {
        if (Utils::isUnset($config)) {
            throw new TeaError([
                'code'    => 'ParameterMissing',
                'message' => "'config' can not be unset",
            ]);
        }
        $this->_accessKeyId             = $config->accessKeyId;
        $this->_accessKeySecret         = $config->accessKeySecret;
        $this->_securityToken           = $config->securityToken;
        $this->_endpoint                = $config->endpoint;
        $this->_protocol                = $config->protocol;
        $this->_userAgent               = $config->userAgent;
        $this->_readTimeout             = Utils::defaultNumber($config->readTimeout, 20000);
        $this->_connectTimeout          = Utils::defaultNumber($config->connectTimeout, 20000);
        $this->_httpProxy               = $config->httpProxy;
        $this->_httpsProxy              = $config->httpsProxy;
        $this->_noProxy                 = $config->noProxy;
        $this->_socks5Proxy             = $config->socks5Proxy;
        $this->_socks5NetWork           = $config->socks5NetWork;
        $this->_maxIdleConns            = Utils::defaultNumber($config->maxIdleConns, 60000);
        $this->_maxIdleTimeMillis       = Utils::defaultNumber($config->maxIdleTimeMillis, 5);
        $this->_keepAliveDurationMillis = Utils::defaultNumber($config->keepAliveDurationMillis, 5000);
        $this->_maxRequests             = Utils::defaultNumber($config->maxRequests, 100);
        $this->_maxRequestsPerHost      = Utils::defaultNumber($config->maxRequestsPerHost, 100);
    }

    /**
     * Encapsulate the request and invoke the network.
     *
     * @param string         $version
     * @param string         $action   api name
     * @param string         $protocol http or https
     * @param string         $method   e.g. GET
     * @param string         $pathname pathname of every api
     * @param mixed[]        $request  which contains request params
     * @param string[]       $headers
     * @param RuntimeOptions $runtime  which controls some details of call api, such as retry times
     *
     * @throws TeaError
     * @throws Exception
     * @throws TeaUnableRetryError
     *
     * @return array the response
     */
    public function doRequest($version, $action, $protocol, $method, $pathname, $request, $headers, $runtime)
    {
        $runtime->validate();
        $_runtime = [
            'timeouted'          => 'retry',
            'readTimeout'        => Utils::defaultNumber($runtime->readTimeout, $this->_readTimeout),
            'connectTimeout'     => Utils::defaultNumber($runtime->connectTimeout, $this->_connectTimeout),
            'httpProxy'          => Utils::defaultString($runtime->httpProxy, $this->_httpProxy),
            'httpsProxy'         => Utils::defaultString($runtime->httpsProxy, $this->_httpsProxy),
            'noProxy'            => Utils::defaultString($runtime->noProxy, $this->_noProxy),
            'maxIdleConns'       => Utils::defaultNumber($runtime->maxIdleConns, $this->_maxIdleConns),
            'maxIdleTimeMillis'  => $this->_maxIdleTimeMillis,
            'keepAliveDuration'  => $this->_keepAliveDurationMillis,
            'maxRequests'        => $this->_maxRequests,
            'maxRequestsPerHost' => $this->_maxRequestsPerHost,
            'retry'              => [
                'retryable'   => $runtime->autoretry,
                'maxAttempts' => Utils::defaultNumber($runtime->maxAttempts, 3),
            ],
            'backoff' => [
                'policy' => Utils::defaultString($runtime->backoffPolicy, 'no'),
                'period' => Utils::defaultNumber($runtime->backoffPeriod, 1),
            ],
            'ignoreSSL' => $runtime->ignoreSSL,
        ];
        $_lastRequest   = null;
        $_lastException = null;
        $_now           = time();
        $_retryTimes    = 0;
        while (Tea::allowRetry(@$_runtime['retry'], $_retryTimes, $_now)) {
            if ($_retryTimes > 0) {
                $_backoffTime = Tea::getBackoffTime(@$_runtime['backoff'], $_retryTimes);
                if ($_backoffTime > 0) {
                    Tea::sleep($_backoffTime);
                }
            }
            $_retryTimes = $_retryTimes + 1;

            try {
                $_request           = new Request();
                $_request->protocol = Utils::defaultString($this->_protocol, $protocol);
                $_request->method   = $method;
                $_request->pathname = $pathname;
                $_request->query    = [
                    'method'           => $action,
                    'version'          => $version,
                    'sign_type'        => 'HmacSHA1',
                    'req_time'         => UtilClient::getTimestamp(),
                    'req_msg_id'       => UtilClient::getNonce(),
                    'access_key'       => $this->_accessKeyId,
                    'base_sdk_version' => 'TeaSDK-2.0',
                    'sdk_version'      => '1.7.10',
                    '_prod_code'       => 'INSURANCE_SAAS',
                    '_prod_channel'    => 'undefined',
                ];
                if (!Utils::empty_($this->_securityToken)) {
                    $_request->query['security_token'] = $this->_securityToken;
                }
                $_request->headers = Tea::merge([
                    'host'       => Utils::defaultString($this->_endpoint, 'openapi.antchain.antgroup.com'),
                    'user-agent' => Utils::getUserAgent($this->_userAgent),
                ], $headers);
                $tmp                               = Utils::anyifyMapValue(RpcUtils::query($request));
                $_request->body                    = Utils::toFormString($tmp);
                $_request->headers['content-type'] = 'application/x-www-form-urlencoded';
                $signedParam                       = Tea::merge($_request->query, RpcUtils::query($request));
                $_request->query['sign']           = UtilClient::getSignature($signedParam, $this->_accessKeySecret);
                $_lastRequest                      = $_request;
                $_response                         = Tea::send($_request, $_runtime);
                $raw                               = Utils::readAsString($_response->body);
                $obj                               = Utils::parseJSON($raw);
                $res                               = Utils::assertAsMap($obj);
                $resp                              = Utils::assertAsMap(@$res['response']);
                if (UtilClient::hasError($raw, $this->_accessKeySecret)) {
                    throw new TeaError([
                        'message' => @$resp['result_msg'],
                        'data'    => $resp,
                        'code'    => @$resp['result_code'],
                    ]);
                }

                return $resp;
            } catch (Exception $e) {
                if (!($e instanceof TeaError)) {
                    $e = new TeaError([], $e->getMessage(), $e->getCode(), $e);
                }
                if (Tea::isRetryable($e)) {
                    $_lastException = $e;

                    continue;
                }

                throw $e;
            }
        }

        throw new TeaUnableRetryError($_lastRequest, $_lastException);
    }

    /**
     * Description: 保险询报价结果查询
     * Summary: 保险询报价结果查询.
     *
     * @param QueryInquiryRequest $request
     *
     * @return QueryInquiryResponse
     */
    public function queryInquiry($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->queryInquiryEx($request, $headers, $runtime);
    }

    /**
     * Description: 保险询报价结果查询
     * Summary: 保险询报价结果查询.
     *
     * @param QueryInquiryRequest $request
     * @param string[]            $headers
     * @param RuntimeOptions      $runtime
     *
     * @return QueryInquiryResponse
     */
    public function queryInquiryEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return QueryInquiryResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.inquiry.query', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 保险产品询价
     * Summary: 保险产品询价.
     *
     * @param SubmitInquiryRequest $request
     *
     * @return SubmitInquiryResponse
     */
    public function submitInquiry($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->submitInquiryEx($request, $headers, $runtime);
    }

    /**
     * Description: 保险产品询价
     * Summary: 保险产品询价.
     *
     * @param SubmitInquiryRequest $request
     * @param string[]             $headers
     * @param RuntimeOptions       $runtime
     *
     * @return SubmitInquiryResponse
     */
    public function submitInquiryEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return SubmitInquiryResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.inquiry.submit', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 历史灾害查询
     * Summary: 历史灾害数据查询.
     *
     * @param QueryDataDisasterRequest $request
     *
     * @return QueryDataDisasterResponse
     */
    public function queryDataDisaster($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->queryDataDisasterEx($request, $headers, $runtime);
    }

    /**
     * Description: 历史灾害查询
     * Summary: 历史灾害数据查询.
     *
     * @param QueryDataDisasterRequest $request
     * @param string[]                 $headers
     * @param RuntimeOptions           $runtime
     *
     * @return QueryDataDisasterResponse
     */
    public function queryDataDisasterEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return QueryDataDisasterResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.data.disaster.query', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 实时天气预警
     * Summary: 实时天气预警.
     *
     * @param QueryDataWeatherRequest $request
     *
     * @return QueryDataWeatherResponse
     */
    public function queryDataWeather($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->queryDataWeatherEx($request, $headers, $runtime);
    }

    /**
     * Description: 实时天气预警
     * Summary: 实时天气预警.
     *
     * @param QueryDataWeatherRequest $request
     * @param string[]                $headers
     * @param RuntimeOptions          $runtime
     *
     * @return QueryDataWeatherResponse
     */
    public function queryDataWeatherEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return QueryDataWeatherResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.data.weather.query', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 报价接口同步接口
     * Summary: 报价接口同步接口.
     *
     * @param SyncQuoteRequest $request
     *
     * @return SyncQuoteResponse
     */
    public function syncQuote($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->syncQuoteEx($request, $headers, $runtime);
    }

    /**
     * Description: 报价接口同步接口
     * Summary: 报价接口同步接口.
     *
     * @param SyncQuoteRequest $request
     * @param string[]         $headers
     * @param RuntimeOptions   $runtime
     *
     * @return SyncQuoteResponse
     */
    public function syncQuoteEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return SyncQuoteResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.quote.sync', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 承保自核申请接口
     * Summary: 承保自核申请接口.
     *
     * @param ApplyUnderwritingRequest $request
     *
     * @return ApplyUnderwritingResponse
     */
    public function applyUnderwriting($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->applyUnderwritingEx($request, $headers, $runtime);
    }

    /**
     * Description: 承保自核申请接口
     * Summary: 承保自核申请接口.
     *
     * @param ApplyUnderwritingRequest $request
     * @param string[]                 $headers
     * @param RuntimeOptions           $runtime
     *
     * @return ApplyUnderwritingResponse
     */
    public function applyUnderwritingEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return ApplyUnderwritingResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.underwriting.apply', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 承保自核结果查询接口
     * Summary: 承保自核结果查询接口.
     *
     * @param QueryUnderwritingRequest $request
     *
     * @return QueryUnderwritingResponse
     */
    public function queryUnderwriting($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->queryUnderwritingEx($request, $headers, $runtime);
    }

    /**
     * Description: 承保自核结果查询接口
     * Summary: 承保自核结果查询接口.
     *
     * @param QueryUnderwritingRequest $request
     * @param string[]                 $headers
     * @param RuntimeOptions           $runtime
     *
     * @return QueryUnderwritingResponse
     */
    public function queryUnderwritingEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return QueryUnderwritingResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.underwriting.query', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 根据保单号查询保单附件，并返回一个有效期为7天的ossurl
     * Summary: 保险科技保单附件查询接口.
     *
     * @param QueryPolicyFileRequest $request
     *
     * @return QueryPolicyFileResponse
     */
    public function queryPolicyFile($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->queryPolicyFileEx($request, $headers, $runtime);
    }

    /**
     * Description: 根据保单号查询保单附件，并返回一个有效期为7天的ossurl
     * Summary: 保险科技保单附件查询接口.
     *
     * @param QueryPolicyFileRequest $request
     * @param string[]               $headers
     * @param RuntimeOptions         $runtime
     *
     * @return QueryPolicyFileResponse
     */
    public function queryPolicyFileEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return QueryPolicyFileResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.policy.file.query', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 保险SaaS投保申请接口
     * Summary: 投保申请接口.
     *
     * @param ApplyInsureRequest $request
     *
     * @return ApplyInsureResponse
     */
    public function applyInsure($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->applyInsureEx($request, $headers, $runtime);
    }

    /**
     * Description: 保险SaaS投保申请接口
     * Summary: 投保申请接口.
     *
     * @param ApplyInsureRequest $request
     * @param string[]           $headers
     * @param RuntimeOptions     $runtime
     *
     * @return ApplyInsureResponse
     */
    public function applyInsureEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return ApplyInsureResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.insure.apply', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 保单结果同步，注意：基于投保信息的保单结果同步。
     * Summary: 保单结果同步（依赖投保申请）.
     *
     * @param NotifyPolicyResultRequest $request
     *
     * @return NotifyPolicyResultResponse
     */
    public function notifyPolicyResult($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->notifyPolicyResultEx($request, $headers, $runtime);
    }

    /**
     * Description: 保单结果同步，注意：基于投保信息的保单结果同步。
     * Summary: 保单结果同步（依赖投保申请）.
     *
     * @param NotifyPolicyResultRequest $request
     * @param string[]                  $headers
     * @param RuntimeOptions            $runtime
     *
     * @return NotifyPolicyResultResponse
     */
    public function notifyPolicyResultEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return NotifyPolicyResultResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.policy.result.notify', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 报案接口
     * Summary: 保险科技 报案接口.
     *
     * @param ApplyClaimRequest $request
     *
     * @return ApplyClaimResponse
     */
    public function applyClaim($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->applyClaimEx($request, $headers, $runtime);
    }

    /**
     * Description: 报案接口
     * Summary: 保险科技 报案接口.
     *
     * @param ApplyClaimRequest $request
     * @param string[]          $headers
     * @param RuntimeOptions    $runtime
     *
     * @return ApplyClaimResponse
     */
    public function applyClaimEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return ApplyClaimResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.claim.apply', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 报案撤销（场景端）
     * Summary: 报案撤销（场景端）.
     *
     * @param CancelClaimRequest $request
     *
     * @return CancelClaimResponse
     */
    public function cancelClaim($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->cancelClaimEx($request, $headers, $runtime);
    }

    /**
     * Description: 报案撤销（场景端）
     * Summary: 报案撤销（场景端）.
     *
     * @param CancelClaimRequest $request
     * @param string[]           $headers
     * @param RuntimeOptions     $runtime
     *
     * @return CancelClaimResponse
     */
    public function cancelClaimEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return CancelClaimResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.claim.cancel', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 报案材料更新（场景端）
     * Summary: 报案材料更新（场景端）.
     *
     * @param UpdateClaimMaterialRequest $request
     *
     * @return UpdateClaimMaterialResponse
     */
    public function updateClaimMaterial($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->updateClaimMaterialEx($request, $headers, $runtime);
    }

    /**
     * Description: 报案材料更新（场景端）
     * Summary: 报案材料更新（场景端）.
     *
     * @param UpdateClaimMaterialRequest $request
     * @param string[]                   $headers
     * @param RuntimeOptions             $runtime
     *
     * @return UpdateClaimMaterialResponse
     */
    public function updateClaimMaterialEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return UpdateClaimMaterialResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.claim.material.update', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 理赔结果确认（场景端）
     * Summary: 理赔结果确认（场景端）.
     *
     * @param ConfirmClaimSettleRequest $request
     *
     * @return ConfirmClaimSettleResponse
     */
    public function confirmClaimSettle($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->confirmClaimSettleEx($request, $headers, $runtime);
    }

    /**
     * Description: 理赔结果确认（场景端）
     * Summary: 理赔结果确认（场景端）.
     *
     * @param ConfirmClaimSettleRequest $request
     * @param string[]                  $headers
     * @param RuntimeOptions            $runtime
     *
     * @return ConfirmClaimSettleResponse
     */
    public function confirmClaimSettleEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return ConfirmClaimSettleResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.claim.settle.confirm', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 理赔结案通知（保司端）
     * Summary: 理赔结案通知（保司端）.
     *
     * @param FinishClaimSettleRequest $request
     *
     * @return FinishClaimSettleResponse
     */
    public function finishClaimSettle($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->finishClaimSettleEx($request, $headers, $runtime);
    }

    /**
     * Description: 理赔结案通知（保司端）
     * Summary: 理赔结案通知（保司端）.
     *
     * @param FinishClaimSettleRequest $request
     * @param string[]                 $headers
     * @param RuntimeOptions           $runtime
     *
     * @return FinishClaimSettleResponse
     */
    public function finishClaimSettleEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return FinishClaimSettleResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.claim.settle.finish', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 保险批改自核接口
     * Summary: 保险批改自核接口.
     *
     * @param ApplyEndorsementStrategyRequest $request
     *
     * @return ApplyEndorsementStrategyResponse
     */
    public function applyEndorsementStrategy($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->applyEndorsementStrategyEx($request, $headers, $runtime);
    }

    /**
     * Description: 保险批改自核接口
     * Summary: 保险批改自核接口.
     *
     * @param ApplyEndorsementStrategyRequest $request
     * @param string[]                        $headers
     * @param RuntimeOptions                  $runtime
     *
     * @return ApplyEndorsementStrategyResponse
     */
    public function applyEndorsementStrategyEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return ApplyEndorsementStrategyResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.endorsement.strategy.apply', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 保单信息离线同步
     * Summary: 保单信息离线同步.
     *
     * @param SyncPolicyResultRequest $request
     *
     * @return SyncPolicyResultResponse
     */
    public function syncPolicyResult($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->syncPolicyResultEx($request, $headers, $runtime);
    }

    /**
     * Description: 保单信息离线同步
     * Summary: 保单信息离线同步.
     *
     * @param SyncPolicyResultRequest $request
     * @param string[]                $headers
     * @param RuntimeOptions          $runtime
     *
     * @return SyncPolicyResultResponse
     */
    public function syncPolicyResultEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return SyncPolicyResultResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.policy.result.sync', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }

    /**
     * Description: 基于通知单号查询保险投保结果
     * Summary: 保险投保结果查询.
     *
     * @param QueryInsureResultRequest $request
     *
     * @return QueryInsureResultResponse
     */
    public function queryInsureResult($request)
    {
        $runtime = new RuntimeOptions([]);
        $headers = [];

        return $this->queryInsureResultEx($request, $headers, $runtime);
    }

    /**
     * Description: 基于通知单号查询保险投保结果
     * Summary: 保险投保结果查询.
     *
     * @param QueryInsureResultRequest $request
     * @param string[]                 $headers
     * @param RuntimeOptions           $runtime
     *
     * @return QueryInsureResultResponse
     */
    public function queryInsureResultEx($request, $headers, $runtime)
    {
        Utils::validateModel($request);

        return QueryInsureResultResponse::fromMap($this->doRequest('1.0', 'antcloud.insurance.insure.result.query', 'HTTPS', 'POST', '/gateway.do', Tea::merge($request), $headers, $runtime));
    }
}
