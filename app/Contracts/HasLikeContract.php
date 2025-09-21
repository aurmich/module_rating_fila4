<?php

declare(strict_types=1);

namespace Modules\Rating\Contracts;

<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;

=======
<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;

=======
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
/**
 * This interface allows models to receive replies.
 */
interface HasLikeContract
{
    /**
<<<<<<< HEAD
     * @param UserContract|null $user
=======
<<<<<<< HEAD
     * @param UserContract|null $user
=======
     * @param \Modules\Xot\Contracts\UserContract|null $user
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
     *
     * @return bool
     */
    public function isLikedBy($user);

    /**
<<<<<<< HEAD
     * @param UserContract|null $user
=======
<<<<<<< HEAD
     * @param UserContract|null $user
=======
     * @param \Modules\Xot\Contracts\UserContract|null $user
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
     *
     * @return void
     */
    public function likedBy($user);

    /**
<<<<<<< HEAD
     * @param UserContract|null $user
=======
<<<<<<< HEAD
     * @param UserContract|null $user
=======
     * @param \Modules\Xot\Contracts\UserContract|null $user
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
     *
     * @return void
     */
    public function dislikedBy($user);
}
