
<template>
  <v-content>
    <v-container>
      <v-card>
        <v-toolbar flat color="primary" dark>
          <v-toolbar-title>Mypage</v-toolbar-title>
        </v-toolbar>
        <v-tabs vertical>
          <v-tab>
            <v-icon left>mdi-account</v-icon>Profile
          </v-tab>
          <v-tab>
            <v-icon left>mdi-microsoft-teams</v-icon>Upload Team Data
          </v-tab>
          <v-tab>
            <v-icon left>mdi-gamepad-variant-outline</v-icon>Upload Match Data
          </v-tab>
          <v-tab>
            <v-icon left>mdi-calendar-text</v-icon>Register Events
          </v-tab>

          <v-tab-item>
            <v-card flat>
              <v-card-text>
                <ValidationProvider v-slot="{ errors }" name="オーナー名" rules="required|max:100">
                  <v-text-field
                    prepend-icon="mdi-account-circle"
                    v-model="name"
                    name="name"
                    :counter="100"
                    :error-messages="errors"
                    label="名前"
                    required
                  ></v-text-field>
                  <v-card-actions>
                    <v-btn primary large block class="primary">Update</v-btn>
                  </v-card-actions>
                </ValidationProvider>
              </v-card-text>
            </v-card>
          </v-tab-item>
          <v-tab-item>
            <v-card flat>
              <v-card-text>
                <v-simple-table dense>
                  <template v-slot:default>
                    <thead>
                      <tr>
                        <th class="text-left">オーナー名</th>
                        <th class="text-left">コメント</th>
                        <th class="text-left">ファイル名</th>
                        <th class="text-left">アップロード日時</th>
                        <th class="text-left">削除</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item, index) in teams" :key="index">
                        <td>{{ item.upload_owner_name }}</td>
                        <td
                          style="white-space:pre-wrap; word-wrap:break-word;"
                        >{{ item.file_comment }}</td>
                        <td>{{ item.file_name }}</td>
                        <td>{{ item.created_at }}</td>
                        <td>
                          <v-icon>mdi-delete-forever</v-icon>
                        </td>
                      </tr>
                    </tbody>
                  </template>
                </v-simple-table>
              </v-card-text>
            </v-card>
          </v-tab-item>
          <v-tab-item>
            <v-card flat>
              <v-card-text>
                <v-simple-table dense>
                  <template v-slot:default>
                    <thead>
                      <tr>
                        <th class="text-left">オーナー名</th>
                        <th class="text-left">コメント</th>
                        <th class="text-left">ファイル名</th>
                        <th class="text-left">アップロード日時</th>
                        <th class="text-left">削除</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item, index) in teams" :key="index">
                        <td>{{ item.upload_owner_name }}</td>
                        <td
                          style="white-space:pre-wrap; word-wrap:break-word;"
                        >{{ item.file_comment }}</td>
                        <td>{{ item.file_name }}</td>
                        <td>{{ item.created_at }}</td>
                        <td>
                          <v-icon>mdi-delete-forever</v-icon>
                        </td>
                      </tr>
                    </tbody>
                  </template>
                </v-simple-table>
              </v-card-text>
            </v-card>
          </v-tab-item>
          <v-tab-item>
            <v-card flat>
              <v-card-text>
                <v-simple-table dense>
                  <template v-slot:default>
                    <thead>
                      <tr>
                        <th class="text-left">イベント名</th>
                        <th class="text-left">イベント詳細</th>
                        <th class="text-left">イベント受付期間締切日</th>
                        <th class="text-left">イベント表示最終日</th>
                        <th class="text-left">削除</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>某イベント</td>
                        <td style="white-space:pre-wrap; word-wrap:break-word;">イベントのテストです</td>
                        <td>{{ new Date() }}</td>
                        <td>{{ new Date() }}</td>
                        <td>
                          <v-icon>mdi-delete-forever</v-icon>
                        </td>
                      </tr>
                    </tbody>
                  </template>
                </v-simple-table>
              </v-card-text>
            </v-card>
          </v-tab-item>
        </v-tabs>
      </v-card>
    </v-container>
  </v-content>
</template>


<script lang="ts">
import { FileDataObject } from "../../vue-data-entity/FileDataObject";
import { Vue, Component } from "vue-property-decorator";
@Component
export default class Mypage extends Vue {
  name: string = "";
  teams: Array<FileDataObject> = [
    {
      id: 1,
      upload_user_id: "1",
      upload_owner_name: "M2",
      file_comment: `■秋季演習大会2019
オーナー名：M2
チーム名：TケルダールN「HB8」
コメント：ハイブリッド月影第8弾`,
      file_name: "TKNHB8.CHE",
      upload_type: "1",
      created_at: new Date("2019-10-19 11:44:30")
    },
    {
      id: 1,
      upload_user_id: "1",
      upload_owner_name: "M2",
      file_comment: `■秋季演習大会2019
オーナー名：M2
チーム名：TケルダールN「HB8」
コメント：ハイブリッド月影第8弾`,
      file_name: "TKNHB8.CHE",
      upload_type: "1",
      created_at: new Date("2019-10-19 11:44:30")
    }
  ];
}
</script>
