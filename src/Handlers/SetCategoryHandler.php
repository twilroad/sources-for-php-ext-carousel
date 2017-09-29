<?php
/**
 * The file is part of Notadd
 *
 * @author: Hollydan<2642956839@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime: 17-9-29 下午2:28
 */

namespace Notadd\Carousel\Handler;


use Notadd\Carousel\Models\Category;
use Notadd\Foundation\Routing\Abstracts\Handler;

class SetCategoryHandler extends Handler
{

    /**
     * Execute Handler.
     *
     * @throws \Exception
     */
    protected function execute()
    {
        $this->validate($this->request, [
            'category_name' => 'required',
            'category_alias' => 'nullable|unique',
        ], [
            'category_name.required' => '请输入分类名称',
            'category_alias.unique' => '分类id已存在，请重新设置',
        ]);

        $category = new Category();
        $category->name = $this->request->get('category_name');

        if (!$this->request->get('category_alias')) {
            do {
                $random = mt_rand(0, 4999);
            } while($this->verify($random));
            $category->alias = $random;
        } else {
            $category->alias = $this->request->get('category_alias');
        }
    }

    /**
     * 验证分类id是否重复
     * @param $verify
     * @return bool
     */
    private function verify($verify)
    {
        $category = Category::where('alias', $verify)->first();
        if ($category instanceof Category) {
            return true;
        } else {
            return false;
        }
    }
}