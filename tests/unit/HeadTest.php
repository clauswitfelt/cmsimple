<?php

/**
 * Testing the head() function.
 *
 * @category  Testing
 * @package   XH
 * @author    The CMSimple_XH developers <devs@cmsimple-xh.org>
 * @copyright 2014-2017 The CMSimple_XH developers <http://cmsimple-xh.org/?The_Team>
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GNU GPLv3
 * @link      http://cmsimple-xh.org/
 */

namespace XH;

/**
 * Testing the head() function.
 *
 * @category Testing
 * @package  XH
 * @author   The CMSimple_XH developers <devs@cmsimple-xh.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GNU GPLv3
 * @link     http://cmsimple-xh.org/
 * @since    1.6.3
 */
class HeadTest extends TestCase
{
    /**
     * The XH_title() mock.
     *
     * @var object
     */
    protected $titleMock;

    /**
     * The XH_plugins() mock.
     *
     * @var object
     */
    protected $pluginsMock;

    /**
     * The XH_pluginStylesheet() mock.
     *
     * @var object
     */
    protected $pluginStylesheetMock;

    /**
     * Sets up the test fixture.
     *
     * @return void
     *
     * @global array The paths of system files and folders.
     * @global array The configuration of the core.
     * @global array The localization of the core.
     */
    public function setUp()
    {
        global $pth, $cf, $tx;

        $this->setConstant('CMSIMPLE_XH_VERSION', 'CMSimple_XH 1.6.3');
        $this->setConstant('CMSIMPLE_XH_BUILD', '2014081201');
        $pth['file'] = array(
            'corestyle' => 'corestyle',
            'stylesheet' => 'stylesheet'
        );
        $cf = array(
            'meta' => array('robots' => 'index, follow'),
            'site' => array(
                'title' => ''
            )
        );
        $tx = array(
            'meta' => array('keywords' => 'CMSimple, XH')
        );
        $this->titleMock = $this->getFunctionMock('XH_title', null);
        $this->pluginsMock = $this->getFunctionMock('XH_plugins', null);
        $this->pluginsMock->expects($this->any())->will($this->returnValue(array()));
        $this->pluginStylesheetMock = $this->getFunctionMock('XH_pluginStylesheet', null);
        $this->pluginStylesheetMock->expects($this->once());
    }

    /**
     * Tears down the test fixture.
     *
     * @return void
     */
    public function tearDown()
    {
        $this->titleMock->restore();
        $this->pluginsMock->restore();
        $this->pluginStylesheetMock->restore();
    }

    /**
     * Tests that the title element is rendered without tags.
     *
     * @return void
     */
    public function testRendersTitleWithoutTags()
    {
        $this->titleMock->expects($this->any())
            ->will($this->returnValue('<b>Website</b>'));
        @$this->assertTag(
            array(
                'tag' => 'title',
                'content' => 'Website'
            ),
            head()
        );
    }

    /**
     * Tests that the meta content-type element is rendered.
     *
     * @return void
     */
    public function testRendersContentType()
    {
        @$this->assertTag(
            array(
                'tag' => 'meta',
                'attributes' => array(
                    'http-equiv' => 'content-type',
                    'content' => 'text/html;charset=UTF-8'
                )
            ),
            head()
        );
    }

    /**
     * Tests that the meta robots element is rendered.
     *
     * @return void
     */
    public function testRendersMetaRobots()
    {
        @$this->assertTag(
            array(
                'tag' => 'meta',
                'attributes' => array(
                    'name' => 'robots',
                    'content' => 'index, follow'
                )
            ),
            head()
        );
    }

    /**
     * Tests that the meta keyword element is rendered.
     *
     * @return void
     */
    public function testRendersMetaKeywords()
    {
        @$this->assertTag(
            array(
                'tag' => 'meta',
                'attributes' => array(
                    'name' => 'keywords',
                    'content' => 'CMSimple, XH'
                )
            ),
            head()
        );
    }

    /**
     * Tests that the meta generator is rendered.
     *
     * @return void
     */
    public function testRendersMetaGenerator()
    {
        @$this->assertTag(
            array(
                'tag' => 'meta',
                'attributes' => array(
                    'name' => 'generator'
                )
            ),
            head()
        );
    }

    /**
     * Tests that the prev link is rendered.
     *
     * @return void
     *
     * @global string The script name.
     * @global array  The page URLs.
     */
    public function testRendersPrevLink()
    {
        global $sn, $u;

        $sn = '/xh/';
        $u = array('Welcome');
        $findPreviousPageMock = $this->getFunctionMock('XH_findPreviousPage', null);
        $findPreviousPageMock->expects($this->any())->will($this->returnValue(0));
        @$this->assertTag(
            array(
                'tag' => 'link',
                'attributes' => array(
                    'rel' => 'prev',
                    'href' => '/xh/?Welcome'
                )
            ),
            head()
        );
        $findPreviousPageMock->restore();
    }

    /**
     * Tests that the next page link is rendered.
     *
     * @return void
     *
     * @global string The script name.
     * @global array  The page URLs.
     */
    public function testRendersNextLink()
    {
        global $sn, $u;

        $sn = '/xh/';
        $u = array('Welcome');
        $findNextPageMock = $this->getFunctionMock('XH_findNextPage', null);
        $findNextPageMock->expects($this->any())->will($this->returnValue(0));
        @$this->assertTag(
            array(
                'tag' => 'link',
                'attributes' => array(
                    'rel' => 'next',
                    'href' => '/xh/?Welcome'
                )
            ),
            head()
        );
        $findNextPageMock->restore();
    }

    /**
     * Tests that the template stylesheet link element is rendered.
     *
     * @return void
     */
    public function testRendersTemplateStylesheetLink()
    {
        @$this->assertTag(
            array(
                'tag' => 'link',
                'attributes' => array(
                    'rel' => 'stylesheet',
                    'type' => 'text/css',
                    'href' => 'stylesheet'
                )
            ),
            head()
        );
    }
}
