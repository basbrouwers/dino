<?php

namespace Modules\Shelter\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterShelterSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item('Asiel', function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item('Honden', function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->route('admin.shelter.animal.index',['type'=>'dog']);
                    $item->authorize(
                        $this->auth->hasAccess('shelter.animals.index')
                    );
                });$item->item('Katten', function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->route('admin.shelter.animal.index',['type'=>'cat']);
                    $item->authorize(
                        $this->auth->hasAccess('shelter.animals.index')
                    );
                });
                $item->item(trans('Adoptanten'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->route('admin.shelter.adopter.index');

                });
                $item->item(trans('shelter::owners.title.owners'), function (Item $item) {
                    $item->weight(0);
                    $item->icon('fa fa-users');
                    $item->route('admin.shelter.owner.index');
                    $item->authorize(

                    );
                });
                $item->item(trans('shelter::breeds.title.breeds'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->route('admin.shelter.breed.index');
                    $item->authorize(
                        $this->auth->hasAccess('shelter.breeds.index')
                    );
                });
// append

            });
        });

        return $menu;
    }
}
