<?php

class Controller_Cms_Page_Settings_Save extends Controller_Cms_Page_Settings
{
    public function admin()
    {
        parent::action_admin();

        $this->log("Saved admin settings for page " . $this->page->getTitle() . " (ID: " . $this->page->getId() . ")");

        $this->page
            ->setInternalName($this->request->input('internal_name'))
            ->save();
    }

    public function children()
    {
        parent::action_children();

        $post = $this->request->input();

        $this->log("Saved child page settings for page ".$this->page->getTitle()." (ID: ".$this->page->getId().")");

        $this->page->setChildTemplateId($post['children_template_id']);

        if ($this->allowAdvanced) {
            $this->page
                ->setChildrenUrlPrefix($this->request->input('children_url_prefix'))
                ->setChildrenVisibleInNav($this->request->input('children_visible_in_nav') == 1)
                ->setChildrenVisibleInNavCms($this->request->input('children_visible_in_nav_cms') == 1)
                ->setGrandchildTemplateId($this->request->input('grandchild_template_id'));

//            $cascade_expected = ['visible_in_nav', 'visible_in_nav_cms'];
        }

        if (isset($post['children_ordering_policy']) && isset($post['children_ordering_direction'])) {
            $this->page->setChildOrderingPolicy($post['children_ordering_policy'], $post['children_ordering_direction']);
        }

//        if (isset($post['cascade']) && ! empty($post['cascade'])) {
//            $cascade = [];
//            foreach ($post['cascade'] as $c) {
//                $cascade[$c] = ($c == 'visible_in_nav' || $c == 'visible_in_nav_cms') ?  $this->page->{"children_$c"} : $this->page->$c;
//            }
//
//            $this->page->cascade_to_children($cascade);
//        }

//        if (isset($post['cascade_template'])) {
//            $this->page->set_template_of_children($this->page->children_template_id);
//        }

        $this->page->save();
    }

    public function feature()
    {
        parent::action_feature();

        $this->log("Updated the feature image of page " . $this->page->getTitle() . " (ID: " . $this->page->getId() . ")");

        $this->page
            ->setFeatureImageId($this->request->input('feature_image_id'))
            ->save();
    }

    public function navigation()
    {
        parent::action_navigation();

        $post = $this->request->input();

        if ($this->allowAdvanced) {
            // Reparenting the page?
            // Check that the ID of the parent has been changed and the page hasn't been set to be a child of itself.
            if ($post['parent_id'] && $post['parent_id'] != $this->page->getParentId() && $post['parent_id'] != $this->page->getId()) {
                // Check that the new parent ID is a valid page.
                $newParent = \Boom\Page\Factory::byId($post['parent_id']);

                if ($newParent->loaded()) {
                    $this->page->setParentPageId($post['parent_id']);
                }
            }
        }

        $this->log("Saved navigation settings for page " . $this->page->getTitle() . " (ID: " . $this->page->getId() . ")");

        $this->page
            ->setVisibleInNav($post['visible_in_nav'])
            ->setVisibleInCmsNav($post['visible_in_nav_cms'])
            ->save();
    }

    public function search()
    {
        parent::action_search();

        $this->log("Saved search settings for page " . $this->page->getTitle() . " (ID: " . $this->page->getId() . ")");

        $this->page
            ->setDescription($this->request->input('description'))
            ->setKeywords($this->request->input('keywords'));

        if ($this->allowAdvanced) {
            $this->page
                ->setExternalIndexing($this->request->input('external_indexing'))
                ->setInternalIndexing($this->request->input('internal_indexing'));
        }

        $this->page->save();
    }

    public function sort_children()
    {
        parent::action_children();

        Database::instance()->begin();
        $this->page->updateChildSequences($this->request->input('sequences'));
        Database::instance()->commit();
    }

    public function visibility()
    {
        parent::action_visibility();

        $this->log("Updated visibility settings for page " . $this->page->getTitle() . " (ID: " . $this->page->getId() . ")");

        $this->page->setVisibleAtAnyTime($this->request->input('visible') == 1);

        if ($this->page->isVisibleAtAnyTime()) {
            $visibleTo = ($this->request->input('toggle_visible_to') == 1) ? new DateTime($this->request->input('visible_to')) : null;

            $this->page
                ->setVisibleFrom(new DateTime($this->request->input('visible_from')))
                ->setVisibleTo($visibleTo);
        }

        $this->page->save();
        $this->response->body( (int) $this->page->isVisible());
    }
}
