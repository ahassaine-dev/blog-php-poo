<?php

namespace App\Data\Models;

class CommentModel extends Model
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    private ?int $id = null;

    private string $content;

    private string $username;

    private int $isApprouved = 0;

    private int $idPost;

    private \DateTimeImmutable $createdAt;

    public static function metadata(): array
    {

        return [
            "table"            => "Comment",
            "primaryKey"       => "id",
            "columns"          => [
                "id"           => [
                    "type"     => "integer",
                    "property" => "id"
                ],
                "content"      => [
                    "type"     => "string",
                    "property" => "content"
                ],
                "username"      => [
                    "type"     => "string",
                    "property" => "username"
                ],
                "created_at"        => [
                    "type"     => "datetime",
                    "property" => "createdAt"
                ],
                "is_approuved"        => [
                    "type"     => "integer",
                    "property" => "isApprouved"
                ],
                "id_post"        => [
                    "type"     => "integer",
                    "property" => "idPost"
                ]
            ]
        ];
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     */
    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }


    /**
     * @return int
     */
    public function getIsApprouved(): int
    {
        return $this->isApprouved;
    }

    /**
     * @param int $isApprouved
     */
    public function setIsApprouved(int $isApprouved): void
    {
        $this->isApprouved = $isApprouved;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeImmutable $createdAt
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getIdPost(): int
    {
        return $this->idPost;
    }

    /**
     * @param int|null $idPost
     */
    public function setIdPost(?int $idPost): void
    {
        $this->idPost = $idPost;
    }

//    public function objectifyForm($data): self
//    {
//        $this->setCreatedAt((new \DateTimeImmutable));
//        return parent::objectifyForm($data);
//    }

}
