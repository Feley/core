<?php


namespace Dogoda\Database;

use App\Application\Policies\Policy;
use Dogoda\Auth\Permission\UserPermission;
use Dogoda\Auth\Permission\UserRoles;
use Dogoda\Auth\Policy\PolicyFactory;
use Dogoda\Exceptions\PolicyNotFoundException;
use App\Interfaces\Autocomplete\PolicyAutocomplete;

class BuilderUserModel extends Model
{

    /**
     * @param string $policy
     * @return PolicyFactory|PolicyAutocomplete
     * @throws PolicyNotFoundException
     */
    final public function can(string $policy)
    {
        $class = new Policy();
        return new PolicyFactory($this, $class->createPolicyObject($policy));
    }

    /**
     * @return UserRoles
     */
    final public function role(): UserRoles
    {
        return new UserRoles($this);
    }

    /**
     * @return UserPermission
     */
    final public function permission(): UserPermission
    {
        return new UserPermission($this);
    }

    /**
     * @param string $privilege
     * @return bool
     */
    final public function isHasPrivilege(string $privilege):bool
    {
        $role = $this->role();
        if ($role->has($privilege) || $role->hasPermission($privilege)) {
            return true;
        }

        $permission = $this->permission();
        if ($permission->has($privilege)) {
            return true;
        }

        return false;
    }
}
