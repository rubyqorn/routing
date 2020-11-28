<?php

namespace Qonsillium\Collections;

class CollectionsFactory
{
    /**
     * $_GET parameters
     * @var array 
     */ 
    protected array $get;

    /**
     * $_POST parameters
     * @var array 
     */ 
    protected array $post;

    /**
     * $_COOKIE parameters
     * @var array 
     */ 
    protected array $cookie;

    /**
     * $_FILES parameters
     * @var array 
     */ 
    protected array $files;

    /**
     * HTTP headers parameters.
     * Can be used getallheaders()
     * @var array 
     */ 
    protected array $headers;

    /**
     * HTTP body parameters
     * @var array 
     */ 
    protected array $body;

    /**
     * $_SERVER parameters
     * @var array 
     */ 
    protected array $server;

    /**
     * Initiate CollectionsFactory constructor method
     * and set GET, POST, cookies, files, headers, body,
     * server parameters
     * @param array $get
     * @param array $post
     * @param array $cookie
     * @param array $files
     * @param array $headers
     * @param array $body 
     * @param array $server
     * @return void 
     */ 
    public function __construct(
        array $get, 
        array $post, 
        array $cookie, 
        array $files, 
        array $headers, 
        array $body,
        array $server
    ) {
        $this->get = $get;
        $this->post = $post;
        $this->cookie = $cookie;
        $this->files = $files;
        $this->headers = $headers;
        $this->body = $body;
        $this->server = $server;
    }

    /**
     * @return \Qonsillium\Collections\ParametersCollection 
     */ 
    public function getGetParametersCollection(): ParametersCollection
    {
        return new ParametersCollection($this->get);
    }

    /**
     * @return \Qonsillium\Collections\ParametersCollection 
     */ 
    public function getPostParametersCollection(): ParametersCollection
    {
        return new ParametersCollection($this->post);
    }

    /**
     * @return \Qonsillium\Collections\CookieCollection 
     */ 
    public function getCookieParametersCollection(): CookieCollection
    {
        return new CookieCollection($this->cookie);
    }

    /**
     * @return \Qonsillium\Collections\FilesCollection 
     */ 
    public function getFilesParametersCollection(): FilesCollection
    {
        return new FilesCollection($this->files);
    }

    /**
     * @return \Qonsillium\Collections\HeadersCollection 
     */ 
    public function getHeadersParametersCollection(): HeadersCollection
    {
        return new HeadersCollection($this->headers);
    }

    /**
     * @return \Qonsillium\Collections\BodyCollection 
     */ 
    public function getBodyParametersCollection(): BodyCollection
    {
        return new BodyCollection($this->body);
    }

    /**
     * @return \Qonsillium\Collections\ServerCollection 
     */ 
    public function getServerParametersCollection(): ServerCollection
    {
        return new ServerCollection($this->server);
    }
}
