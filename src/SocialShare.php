<?php

namespace NYCooookie\SocialShare;

/**
 *  A sample class
 *
 *  Use this section to define what this class is doing, the PHPDocumentator will use this
 *  to automatically generate an API documentation using this information.
 *
 *  @author yourname
 */
class SocialShare {

    protected $title;
    protected $url;
    protected $description;
    protected $twitterHandle;

    public function __construct(string $title, string $url, string $description = null)
    {
        $this->title = $title;
        $this->url = $url;

        if ($description) {
            $this->description = $description;
        }
    }

    public function twitter(): string
    {
        $baseUrl = 'https://twitter.com/intent/tweet';

        $params = [
            'text' => $this->title,
            'url' => $this->url
        ];

        return $this->url_append_parameters($baseUrl, $params);
    }

    public function facebook(): string
    {
        $baseUrl = 'https://www.facebook.com/sharer/sharer.php';

        $params = [
            'u' => $this->url,
        ];

        return $this->url_append_parameters($baseUrl, $params);
    }

    public function xing()
    {
        $baseUrl = 'https://www.xing.com/spi/shares/new';

        $params = [
            'url' => $this->url,
        ];

        return $this->url_append_parameters($baseUrl, $params);
    }

    public function linkedin(): string
    {
        $baseUrl = 'https://www.linkedin.com/shareArticle';

        $params = [
            'url' => $this->url,
            'summary' => $this->description
        ];

        return $this->url_append_parameters($baseUrl, $params);
    }

    public function mail(): string
    {
        $params = [
            'subject' => $this->title,
            'body' => $this->description . ': ' . $this->url
        ];

        return $this->mail_with_parameters($params);
    }

    public function all(): array
    {
        return [
            'facebook' => $this->facebook(),
            'twitter' => $this->twitter(),
            'xing' => $this->xing(),
            'linkedin' => $this->linkedin(),
            'mail' => $this->mail()
        ];
    }

    private function url_append_parameters(String $url, array $parameters)
    {
        foreach ($parameters as $key => $value) {
            $url = $this->url_append_parameter($url, $key, $value);
        }

        return $url;
    }

    private function url_append_parameter(String $url, String $key, String $value)
    {
        $query = parse_url($url, PHP_URL_QUERY);

        $key = urlencode($key);
        $value = urlencode($value);

        return $query ? "{$url}&{$key}={$value}" : "{$url}?{$key}={$value}";
    }

    private function mail_with_parameters(array $parameters)
    {
        $base = 'mailto:?';

        foreach ($parameters as $key => $value) {
            $key = rawurlencode($key);
            $value = rawurlencode($value);

            $base = "{$base}{$key}={$value}&";
        }

        if (substr($base, -1) === '&')
            $base = substr($base, 0, -1);

        return $base;
    }

}